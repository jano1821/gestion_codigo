<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("cargo", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create cargo
    </h1>
</div>

{{ content() }}

{{ form("cargo/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldDescripcioncargo" class="col-sm-2 control-label">DescripcionCargo</label>
    <div class="col-sm-10">
        {{ text_field("descripcionCargo", "size" : 30, "class" : "form-control", "id" : "fieldDescripcioncargo") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
