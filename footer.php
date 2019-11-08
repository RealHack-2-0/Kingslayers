<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    jQuery(document).ready(function(){
        

        jQuery("#add_ans").on('click',function(){
            
          var qn_id = <?php echo $qn_id?>;
                
            var answer_content = $.trim($(".answer_content").val());
            if(answer_content!=''){
                $.ajax({
                    url:'add_answer.php',
                    data:'ans_content=' + answer_content + '&qn_id=' + qn_id,
                    success:function(msg){
                        if(msg=='success'){
                            location.reload();
                        } else if(msg=='abused_failed'){
                            alert('Offensive words found! Unable to post your answer.')
                        } else {
                            alert('Unable to post answer!');
                        }
                    }
                });
            }else{
                alert('Enter an answer to post!')
            }
        });


        // updating the view with notifications using ajax
    //     function load_unseen_notification(view = '')
    //     {
    //         $.ajax({
    //         url:"fetch.php",
    //         method:"POST",
    //         data:{view:view},
    //         dataType:"json",
    //         success:function(data)
    //         {
    //         $('.dropdown-menu').html(data.notification);
    //         if(data.unseen_notification > 0)
    //             {
    //                 $('.count').html(data.unseen_notification);
    //             }
    //         }
    //     });
    //     }

    //     load_unseen_notification();

    //     // load new notifications
    //     $(document).on('click', '.dropdown-toggle', function(){
    //     $('.count').html('');
    //     load_unseen_notification('yes');
    //     });
        
    //     setInterval(function(){
    //     load_unseen_notification();;
    //     }, 5000);
        
    // });

    // jQuery(".dropdown").on('click',function(){
    //     $.ajax({
    //         url:'seen_notification.php',
    //         data:'msg=msg',
    //         success:function(){}
    //     });
    // });

    function loadDoc() {
  
    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            responseArr = JSON.parse(this.response);
            document.getElementById("dropdown_menu").innerHTML = responseArr['notification'];
            document.getElementById("count").innerHTML = responseArr['unseen_notification'];
        }
    };
    xhttp.open("GET", "data.php", true);
    xhttp.send();

    },1000);

    }
    loadDoc();



    

    
  
  

  });





</script>
