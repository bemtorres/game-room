@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs_show')
    <div class="row">
      <div class="col-12 col-md-12 d-flex">
        <div class="card flex-fill">
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>ID Cartón</th>
                  <th>Números</th>
                  <th>Puntos</th>
                  <th>Porcentaje</th>
                  <th>Posición</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($claims as $c)
                <tr>
                  <th>{{ $c->getFechaCreacion()->getDateTime() }}</th>
                  <td>{{ $c->usuario_claim->name }}</td>
                  <td>{{ $c->usuario_claim->email }}</td>
                  <td>{{ $c->loto->id }}</td>
                  <td>
                    @php
                      $count = 0;
                    @endphp
                    @foreach ($c->loto->getCode() as $kC => $vC)
                      @php
                        $selected = false;
                        if ($numbers_selected) {
                          foreach ($numbers_selected as $kN => $vN) {
                            if ($vC == $vN) {
                              $selected = true;
                              $count++;
                              break;
                            }
                          }
                        }
                      @endphp
                        <span class="{{ $selected ? 'badge badge-pill bg-success' : 'badge badge-pill bg-dark' }}">
                          {{ $vC }}
                        </span>
                    @endforeach
                  </td>
                  <td>
                    <strong>{{ $count }} / 15</strong>
                  </td>
                  <td>
                    @if ($count > 0)
                      {{ round(($count / 15 ) * 100,1) }}
                    @else
                      0
                    @endif
                    %
                  </td>
                  <td>{{ $c->position }}</td>
                  <td>
                    <span type="button" class="badge bg-{{ $c->getStatus()[2] }}" data-bs-toggle="modal" data-bs-target="#newModal" data-id="{{ $c->id }}">
                      <i class="{{ $c->getStatus()[1] }}"></i>
                      {{ $c->getStatus()[0] }}
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activar o Desactivar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-submit" action="{{ route('room.solicitudes.validar', $r->id) }}" method="post">
        <input type="hidden" name="id" id="option_id">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="inputLugar" class="form-label">LUGAR</label>
            <select class="form-select form-select-lg mb-3" id="inputLugar" name="position">
              <option value="">------------</option>
              <option value="1">1° LUGAR</option>
              <option value="2">2° LUGAR</option>
              <option value="3">3° LUGAR</option>
              <option value="4">4° LUGAR</option>
              <option value="5">5° LUGAR</option>
              <option value="6">6° LUGAR</option>
              <option value="7">7° LUGAR</option>
              <option value="8">8° LUGAR</option>
              <option value="9">9° LUGAR</option>
              <option value="10">10° LUGAR</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="inputEstado" class="form-label">ESTADO</label>
            <select class="form-select form-select-lg mb-3" id="inputEstado" name="status">
              <option value="1">PENDIENTE</option>
              <option value="2">ACEPTADO</option>
              <option value="3">CANCELADO</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
@push('javascript')
<script>
    $(function () {
      $('#newModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('#option_id').val(id);
      });
  });
</script>
@endpush
