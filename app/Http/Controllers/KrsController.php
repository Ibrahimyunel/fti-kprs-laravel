<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;


class KrsController extends Controller
{
    public function index()
    {
        return view('kprs');
    }

    
    public function store(Request $request)
    {
        $auth = DB::table('mmahasiswa')
        ->select('cnim', 'PASSWORD')
        ->where(['cnim' => $request->cnim, 'PASSWORD' => $request->password])
        ->get()->first();

        if ($auth) {
            return redirect('show/' . $request->cnim)->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['cnim' => 'Invalid Credentials!'])->onlyInput('cnim');
    }


    public function show($id)
    {
        $data = DB::table('mmahasiswa')
            ->select('cnim', 'CNAMA', 'CALAMAT', 'CTEMPLHR', 'DTGLHR', 'IPK')
            ->where(['cnim' => $id])
            ->get()->first();

        $totalSKS = DB::table('trkrs')
        ->join('mtbmtkul', 'trkrs.CNOTAB', '=', 'mtbmtkul.CNOTAB')
        ->where(['trkrs.CNIM' => $id])
        ->sum('mtbmtkul.NSKS');

        $datakrs = DB::table('trkrs')
            ->select(
                'mtbmtkul.CNOTAB',
                'mtbmtkul.CNAMAMK',
                'mtbmtkul.NSKS',
                'tjadkul.CKELOMPOK',
                'tjadkul.CHARI',
                'tjadkul.CSESI',
                'tjadkul.NOJADKUL'
            )
            ->join('mtbmtkul', 'trkrs.CNOTAB', '=', 'mtbmtkul.CNOTAB')
            ->join('tjadkul', 'trkrs.NOJADKUL', '=', 'tjadkul.NOJADKUL')
            ->where(['trkrs.CNIM' => '' . $id])
            ->get();

        $kprsList = DB::table('tjadkul')
            ->select(
                'mtbmtkul.CNOTAB',
                'mtbmtkul.CNAMAMK',
                'mtbmtkul.NSKS',
                'tjadkul.CKELOMPOK',
                'tjadkul.CHARI',
                'tjadkul.CSESI',
                'tjadkul.NMAKS',
                'tjadkul.NISI',
                'tjadkul.NOJADKUL'
            )
            ->join('mtbmtkul', 'tjadkul.CNOTAB', '=', 'mtbmtkul.CNOTAB')
            ->orderBy('mtbmtkul.CNAMAMK', 'ASC')
            ->get();

        return view('show', compact(['data', 'datakrs', 'kprsList', 'totalSKS']));
    }


    public function add($id, $no, $totalsks)
    {
        $addData = DB::table('tjadkul')
            ->select('tjadkul.CTHAJAR', 'tjadkul.CSMT', 'tjadkul.CNOTAB', 'tjadkul.CKELOMPOK', 'tjadkul.NOJADKUL', 'mtbmtkul.NSKS',
             'tjadkul.NMAKS', 'tjadkul.NISI')
            ->join('mtbmtkul', 'tjadkul.CNOTAB', '=', 'mtbmtkul.CNOTAB')
            ->where(['tjadkul.NOJADKUL' => $no])
            ->get()->first();

        $ipk = DB::table('mmahasiswa')
            ->select('IPK')
            ->where(['cnim' => $id])
            ->get()->first();

        $sksCheck = $totalsks + $addData->NSKS;

        if ($ipk->IPK >= 3 && $sksCheck <= 24) {
            $approve = 1;
        } elseif ($ipk->IPK >= 2.75 && $sksCheck <= 22) {
            $approve = 1;
        } elseif ($ipk->IPK >= 2 && $sksCheck <= 20) {
            $approve = 1;
        } elseif ($ipk->IPK < 2 && $sksCheck <= 18) {
            $approve = 1;
        } else {
            $approve = 0;
        }

        if ($approve == 0) {
            return redirect('show/' . $id)->with('message', 'Failed to add subject due to your SKS limit!');
        }
        if ($addData->NMAKS <= $addData->NISI) {
            return redirect('show/' . $id)->with('message', 'Sorry.. Failed to add, subject is full!');
        }

        DB::table('trkrs')->insert([
            'CKDFAK' => '01',
            'CTHAJAR' => $addData->CTHAJAR,
            'CSMT' => $addData->CSMT,
            'CNOTAB' => $addData->CNOTAB,
            'CKELOMPOK' => $addData->CKELOMPOK,
            'CNIM' => $id,
            'NOJADKUL' => $addData->NOJADKUL
        ]);

        DB::table('tjadkul')
            ->where(['NOJADKUL' => $no])
            ->increment('NISI');

        return redirect('show/' . $id)->with('message', 'Subject added successfully!');
    }


    public function destroy($id, $no)
    {
        DB::table('trkrs')
            ->where(['CNIM' => '' . $id, 'NOJADKUL' => $no])
            ->delete();

        DB::table('tjadkul')
            ->where(['NOJADKUL' => $no])
            ->decrement('NISI');

        return redirect('show/' . $id)->with('message', 'Subject removed successfully!');
    }


    public function printpdf($id)
    {
        $data = DB::table('mmahasiswa')
            ->select('cnim', 'CNAMA', 'CALAMAT', 'CTEMPLHR', 'DTGLHR', 'IPK')
            ->where(['cnim' => $id])
            ->get()->first();

        $totalSKS = DB::table('trkrs')
        ->join('mtbmtkul', 'trkrs.CNOTAB', '=', 'mtbmtkul.CNOTAB')
        ->where(['trkrs.CNIM' => $id])
        ->sum('mtbmtkul.NSKS');

        $datakrs = DB::table('trkrs')
            ->select(
                'mtbmtkul.CNOTAB',
                'mtbmtkul.CNAMAMK',
                'mtbmtkul.NSKS',
                'tjadkul.CKELOMPOK',
                'tjadkul.CHARI',
                'tjadkul.CSESI',
                'tjadkul.NOJADKUL'
            )
            ->join('mtbmtkul', 'trkrs.CNOTAB', '=', 'mtbmtkul.CNOTAB')
            ->join('tjadkul', 'trkrs.NOJADKUL', '=', 'tjadkul.NOJADKUL')
            ->where(['trkrs.CNIM' => '' . $id])
            ->get();
        
        $pdf = PDF::loadview('print-pdf', compact(['data', 'datakrs', 'totalSKS']));
    	return $pdf->download('laporankrs-' . $id . '.pdf');
    }
}
