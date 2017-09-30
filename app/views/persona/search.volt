<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("persona/index", "Go Back") }}</li>
            <li class="next">{{ link_to("persona/new", "Create ") }}</li>
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
                <th>Idpersona</th>
            <th>NombrePersona</th>
            <th>IdCargo</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for persona in page.items %}
            <tr>
                <td>{{ persona.idpersona }}</td>
            <td>{{ persona.nombrePersona }}</td>
            <td>{{ persona.idCargo }}</td>

                <td>{{ link_to("persona/edit/"~persona.idpersona, "Edit") }}</td>
                <td>{{ link_to("persona/delete/"~persona.idpersona, "Delete") }}</td>
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
                <li>{{ link_to("persona/search", "First") }}</li>
                <li>{{ link_to("persona/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("persona/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("persona/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
