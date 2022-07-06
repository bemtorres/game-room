<td>
  <div class="row">
    <div class="col-4 col-md-2">
      <img src="{{ $img ?? '' }}" width="60px" height="60px" class="img-fluid rounded-3" alt="...">
    </div>
    <div class="col-8 col-md-6">
      <small>{{ $date ?? '' }}</small><br/>
      <p class="fw-bold {{ $isMobile ? '' : 'h6' }}">
        {{ $comment ?? '' }}
      </p>
    </div>
  </div>
</td>
{{-- IN / OUT --}}
<td class="fw-bold text-end h6">
@if (($type ?? 'IN') == 'IN')
  <span class="text-success ">
    ${{ $money }} <i class="bi bi-box-arrow-in-down-left"></i>
  </span>
@else
  - ${{ $money }} <i class="bi bi-box-arrow-in-up-right text-danger"></i>
@endif
</td>
