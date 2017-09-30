<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("usuario/index", "Go Back") }}</li>
            <li class="next">{{ link_to("usuario/new", "Create ") }}</li>
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
                <th>IdUsuario</th>
            <th>UserName</th>
            <th>Password</th>
            <th>EstadoRegistro</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for usuario in page.items %}
            <tr>
                <td>{{ usuario.idUsuario }}</td>
            <td>{{ usuario.userName }}</td>
            <td>{{ usuario.password }}</td>
            <td>{{ usuario.estadoRegistro }}</td>

                <td>{{ link_to("usuario/edit/"~usuario.idUsuario, "Edit") }}</td>
                <td>{{ link_to("usuario/delete/"~usuario.idUsuario, "Delete") }}</td>
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
                <li>{{ link_to("usuario/search", "First") }}</li>
                <li>{{ link_to("usuario/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("usuario/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("usuario/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
