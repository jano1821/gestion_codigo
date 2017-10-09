<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("tipocodigo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
{{ link_to("tipocodigo/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Tipo Codigo","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

<div class="table-responsive">
<table class="table">
<tr  class="info">
<tr>
<th>Descripcion de Tipo</th>
<th>Longitud de Tipo</th>

<th></th>
<th></th>
</tr>
<tbody>
{% if page.items is defined %}
{% for tipocodigo in page.items %}
<tr>
<td>{{ tipocodigo.descripcionTipo }}</td>
<td>{{ tipocodigo.longitudCodigo }}</td>

<td>{{ link_to("tipocodigo/edit/"~tipocodigo.idTipoCodigo, "<i class='glyphicon glyphicon-edit'></i>","class":"btn btn-default") }}</td>
<td>{{ link_to("tipocodigo/delete/"~tipocodigo.idTipoCodigo, "<i class='glyphicon glyphicon-trash'></i>","class":"btn btn-default") }}</td>
</tr>
{% endfor %}
{% endif %}
</tbody>
</table>
</div>

<div class="row">
<div class="col-sm-1">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
{{ page.current~"/"~page.total_pages }}
</p>
</div>
<div class="col-sm-11">
<nav>
<ul class="pagination">
<li>{{ link_to("tipocodigo/search", "Primero") }}</li>
<li>{{ link_to("tipocodigo/search?page="~page.before, "Anterior") }}</li>
<li>{{ link_to("tipocodigo/search?page="~page.next, "Siguiente") }}</li>
<li>{{ link_to("tipocodigo/search?page="~page.last, "Ultimo") }}</li>
</ul>
</nav>
</div>
</div>

</div>
</div>
</div>