<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("tipocodigo", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create tipocodigo
    </h1>
</div>

{{ content() }}

{{ form("tipocodigo/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldDescripciontipo" class="col-sm-2 control-label">DescripcionTipo</label>
    <div class="col-sm-10">
        {{ text_field("descripcionTipo", "size" : 30, "class" : "form-control", "id" : "fieldDescripciontipo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadoregistro" class="col-sm-2 control-label">EstadoRegistro</label>
    <div class="col-sm-10">
        {{ text_field("estadoRegistro", "size" : 30, "class" : "form-control", "id" : "fieldEstadoregistro") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
