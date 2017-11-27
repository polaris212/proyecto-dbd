      @extends('layouts.app')

      @section('content')
      <div class="container">D
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

              <div class="panel-heading">Detalles del centro</div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-12 control-label">Nombre del centro</label>
                  <p class="col-sm-12 control-label">{{ $centro->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de inicio</label>
                  <p class="col-sm-12 control-label">{{ $centro->fecha_inicio }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de termino</label>
                  <p class="col-sm-12 control-label">{{ $centro->fecha_termino }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Region</label>
                  <p class="col-sm-12 control-label">{{ $region->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Provincia</label>
                  <p class="col-sm-12 control-label">{{ $provincia->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Comuna</label>
                  <p class="col-sm-12 control-label">{{ $comuna->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Direccion</label>
                  <p class="col-sm-12 control-label">{{ $centro->direccion }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Descripcion:</label>
                  <p class="col-md-12 control-label">{{ $centro->descripcion }}</p>
                </div>
                

              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection