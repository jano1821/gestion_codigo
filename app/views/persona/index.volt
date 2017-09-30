<div class="page-header">
    <h1>
        Search persona
    </h1>
    <p>
        {{ link_to("persona/new", "Create persona") }}
    </p>
</div>

{{ content() }}

{{ form("persona/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdpersona" class="col-sm-2 control-label">Idpersona</label>
    <div class="col-sm-10">
        {{ text_field("idpersona", "type" : "numeric", "class" : "form-control", "id" : "fieldIdpersona") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNombrepersona" class="col-sm-2 control-label">NombrePersona</label>
    <div class="col-sm-10">
        {{ text_field("nombrePersona", "size" : 30, "class" : "form-control", "id" : "fieldNombrepersona") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdcargo" class="col-sm-2 control-label">IdCargo</label>
    <div class="col-sm-10">
        {{ text_field("idCargo", "type" : "numeric", "class" : "form-control", "id" : "fieldIdcargo") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
