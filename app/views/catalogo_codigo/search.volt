<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("catalogo_codigo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
{{ link_to("catalogo_codigo/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Codigo","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("catalogo_codigo/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="table-responsive">
<table class="table">
<tr  class="info">
<th>Codigo</th>
<th>Descripcion</th>
<th>Fecha de Registro</th>
<th>Requerimiento</th>
<th>Lider Técnico</th>
<th>Lider Funcional</th>
<th>Tipo Codigo</th>
<th>Módulo</th>
<th class='text-center'></th>
<th class='text-center'></th>
</tr>
<tbody>
{% if page.items is defined %}
{% for catalogoCodigo in page.items %}
<tr>
<td>{{ catalogoCodigo.valorCodigo }}</td>
<td>{{ catalogoCodigo.descripcionCodigo }}</td>
<td align="center">{{ catalogoCodigo.fechaRegistro }}</td>
<td>{{ catalogoCodigo.requerimiento }}</td>
<td>{{ catalogoCodigo.liderTecnico }}</td>
<td>{{ catalogoCodigo.liderFuncional }}</td>
<td>{{ catalogoCodigo.descripcionTipo }}</td>
<td>{{ catalogoCodigo.descripcionModulo }}</td>

<td>{{ link_to("catalogo_codigo/edit/"~catalogoCodigo.idCodigo, "<i class='glyphicon glyphicon-edit'></i>","class":"btn btn-default") }}</td>
<td>{{ link_to("catalogo_codigo/delete/"~catalogoCodigo.idCodigo, "<i class='glyphicon glyphicon-trash'></i>","class":"btn btn-default") }}</td>
</tr>
{% endfor %}
{% endif %}
</tbody>
</table>
</div>

{{ hidden_field("valorCodigo") }}
{{ hidden_field("descripcionCodigo") }}
{{ hidden_field("Requerimiento") }}
{{ hidden_field("idLiderTecnico") }}
{{ hidden_field("idLiderFuncional") }}
{{ hidden_field("idTipoCodigo") }}
{{ hidden_field("idModulo") }}
{{ hidden_field("pagina") }}
{{ hidden_field("avance") }}

<div class="row">
<div class="col-sm-2">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
{{ "Página "~page.current~" de "~page.total_pages }}
</p>
</div>
<div class="col-sm-10">
<nav>
<ul class="pagination">
{{ submit_button('Primero', 'class': 'btn btn-info','onclick':'paginacion(0);') }}
{{ submit_button('Anterior', 'class': 'btn btn-info','onclick':'paginacion(-1);') }}
{{ submit_button('Siguiente', 'class': 'btn btn-info','onclick':'paginacion(1);') }}
{{ submit_button('Ultimo', 'class': 'btn btn-info','onclick':'paginacion(2);') }}
</ul>
</nav>
</div>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
    function paginacion(valor){
        document.getElementById('avance').value = valor;
    }
</script>