@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="C-card C-popup">
  <h2>
    {{session('message')}}
  </h3>
</div>
@endif