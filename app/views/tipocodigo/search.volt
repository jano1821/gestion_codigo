<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("tipocodigo/index", "Go Back") }}</li>
            <li class="next">{{ link_to("tipocodigo/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>IdTipoCodigo</th>
            <th>DescripcionTipo</th>
            <th>EstadoRegistro</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for tipocodigo in page.items %}
            <tr>
                <td>{{ tipocodigo.idTipoCodigo }}</td>
            <td>{{ tipocodigo.descripcionTipo }}</td>
            <td>{{ tipocodigo.estadoRegistro }}</td>

                <td>{{ link_to("tipocodigo/edit/"~tipocodigo.idTipoCodigo, "Edit") }}</td>
                <td>{{ link_to("tipocodigo/delete/"~tipocodigo.idTipoCodigo, "Delete") }}</td>
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
                <li>{{ link_to("tipocodigo/search", "First") }}</li>
                <li>{{ link_to("tipocodigo/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("tipocodigo/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("tipocodigo/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
