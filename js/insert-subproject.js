//จัดการการเพิ่มรายการในโครงการ
$(document).ready(function(){

    $('#save').click(function(){
        var el = this;
                $.ajax({
                    url: 'insert-item.php',
                    type: 'POST',
                    data: $("#frmMain").serialize(),
                    success: function(response){
                        console.log('this is'+response);
                        if(response == 1){
                           alert('Yes');
                         /*
                            // Remove row from HTML Table
                            $(el).closest('tr').css('background','tomato');
                            $(el).closest('tr').fadeOut(800,function(){
                                $(this).remove();
                            });
                         */
                        /*
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            text: 'มีบางอย่างผิดพลาด!',
                            footer: '<a href>ติดต่อ admin</a>'
                        })
                         */
                        }else{
                        Swal.fire({
                                icon: 'error',
                                title: 'อุ๊บบ...',
                                text: 'มีบางอย่างผิดพลาด!',
                                footer: '<a href>ติดต่อ admin</a>'
                            })
                        }  //if
                        
                    } //callback function
                });  //ajax
    });  //click
});  //document.ready