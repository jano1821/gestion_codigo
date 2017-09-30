<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
                {{ link_to("catalogo_codigo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
            </div>
            <h4><i class='glyphicon glyphicon-record'></i> Registrar Nuevo Código</h4>
	</div>
        <div class="page-header">
        </div>

        {{ content() }}

        {{ form("catalogo_codigo/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
            <div class="table">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldValorcodigo" class="control-label">Código</label>
                    </div>
                    <div class="col-md-2">
                        {{ text_field("valorCodigo", "size" : 30, "class" : "form-control", "id" : "fieldValorcodigo") }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldDescripcioncodigo" class="control-label">Descripcion</label>
                    </div>
                    <div class="col-md-4">
                        {{ text_field("descripcionCodigo", "size" : 200, "class" : "form-control", "id" : "fieldDescripcioncodigo") }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldFecharegistro" class="control-label">Fecha de Registro</label>
                    </div>
                    <div class="col-md-2">
                        {{ date_field("fechaRegistro", "size" : 10, "class" : "form-control", "id" : "fieldFecharegistro") }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldRequerimiento" class="control-label">Requerimiento</label>
                    </div>
                    <div class="col-md-2">
                        {{ text_field("Requerimiento", "size" : 30, "class" : "form-control", "id" : "fieldRequerimiento") }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldIdlidertecnico" class="control-label">Líder Tecnico</label>
                    </div>
                    <div class="col-md-3">
                        {% if liderTecnico is defined %}
                            {{ select("idLiderTecnico", liderTecnico,'useEmpty': true, 'emptyText': 'Seleccione un Líder Técnico...', 'emptyValue': '', 'using': ['idpersona', 'nombrePersona'], "class" : "form-control") }}
                        {% endif %}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldIdliderfuncional" class="control-label">Líder Funcional</label>
                    </div>
                    <div class="col-md-3">
                        {% if liderFuncional is defined %}
                            {{ select("idLiderFuncional", liderFuncional, liderTecnico,'useEmpty': true, 'emptyText': 'Seleccione un Líder Funcional...', 'emptyValue': '', 'using': ['idpersona', 'nombrePersona'], "class" : "form-control") }}
                        {% endif %}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldIdtipocodigo" class="control-label">Tipo Codigo</label>
                    </div>
                    <div class="col-md-3">
                        {% if tipoCodigo is defined %}
                            {{ select("idTipoCodigo", tipoCodigo,'useEmpty': true, 'emptyText': 'Seleccione un Tipo de Código...', 'emptyValue': '', 'using': ['idTipoCodigo', 'descripcionTipo'], "class" : "form-control") }}
                        {% endif %}
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        {{ submit_button('Guardar', 'class': 'btn btn-primary') }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>