

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 70px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-comment"> información del comentario</i></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="textarea" name="" id="idc" value="" hidden>
            <input type="textarea" name="" id="saber" value="" hidden>
            <div class="form-group " style="margin-left: -10px;" >
                <textarea class="form-control" id="comentario" rows="2" required>
                </textarea> 
            </div>
            <div class="alert modal-body " id="errorc"></div>
        </div>
        <div class="modal-footer">
  
            <button class="btn btn-default btn-sm" onclick="eliminar()" > <i class="fa fa-trash btn-danger "  ></i>Eliminar</button>

            <button class="btn btn-default btn-sm " aria-label="Close" onclick="actualizar()"> <i class="fa fa-edit btn-info"  ></i>Guardar Cambios</button>

        </div>
      
    </div>
  </div>
</div>


    
      