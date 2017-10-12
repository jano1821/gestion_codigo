<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        /*$.ajax({
            url: "{{ url('catalogo_codigo/ajax') }}"
        }).done(function(data) {
            console.log(data)
        });*/
    
        $('#dugme').on("click",function(e){
        e.preventDefault();
            $.post("{{ url('catalogo_codigo/ajaxPost') }}", $(this).serialize() , function(data) {
                document.getElementById("valorCodigo").value=data.res.email;
            }).done(function() { 
                alert("correcto"); 
            }).fail(function() {
                alert("error"); 
            })
        });

        
    })
</script>






public function ajaxAction() {
        $this->view->disable();
        if ($this->request->isGet() == true) {
            if ($this->request->isAjax() == true) {
                $this->response->setJsonContent(array('res' => array("1", "2", "3")));
                $this->response->setStatusCode(200,
                                               "OK");
                $this->response->send();
            }
        }else {
            $this->response->setStatusCode(404,
                                           "Not Found");
        }
    }