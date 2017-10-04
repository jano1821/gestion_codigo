<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    {{ link_to("persona/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
                </div>
                <h4><i class='glyphicon glyphicon-record'></i> Registrar Nuevo Persona</h4>
            </div>
            <div class="page-header">
        </div>

    {{ content() }}

    {{ form("persona/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

    <div class="table">
        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
                <label for="fieldNombrepersona" class="control-label">Nombre Persona</label>
            </div>
            <div class="col-md-4">
                {{ text_field("nombrePersona", "size" : 30, "class" : "form-control", "id" : "fieldNombrepersona") }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
                <label for="fieldIdcargo" class="control-label">Cargo</label>
            </div>
            <div class="col-md-3">
                {% if cargo is defined %}
                    {{ select("idCargo", cargo,'useEmpty': true, 'emptyText': 'Seleccione Cargo...', 'emptyValue': '', 'using': ['idCargo', 'descripcionCargo'], "class" : "form-control") }}
                {% endif %}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
                {{ submit_button('Guardar', 'class': 'col-sm-10 btn btn-primary') }}
            </div>
        </div>
    </div>
    </form>
    </div>
</div>