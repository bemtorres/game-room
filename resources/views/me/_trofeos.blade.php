<div class="col-12 col-lg-8 col-xxl-9 d-flex">
  <div class="card flex-fill">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>LUGAR</th>
            <th>ID CARTÓN</th>
            <th>SALA</th>
            <th>FECHA</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($u->trofeos as $c)
          @continue($c->status != 2)
          <tr>
            <td>
              <h3><i class="{{ $c->getPlace() }}"></i> {{ $c->position }}° LUGAR</h3>
            </td>
            <td>
              <h3><strong># {{ $c->loto_id }}</strong></h3>
            </td>
            <td><strong>{{ $c->room->id }}</strong>-{{ $c->room->name }}</td>
            <th class="align-middle">
              {{ $c->getFechaCreacion()->getDatetime() }}
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>