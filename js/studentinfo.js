$(function() {
   
    
    $('#studentTable').dataTable({});
   
    var sTable = $('#studentTable').dataTable();
    
    
    $('#studentTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            var $this = $(this);
            var row = $this.closest("tr");
            var id = row.find('td:eq(0)').text();
            document.getElementById("studentID").value = id;
            
            $.ajax({
                url: 'classes/class.main.php',
                type: 'POST',
                dataType: 'JSON',
                data: {'id' : id},
                error: function(ts) { alert(ts.responseText) }
            }).done(function(data) {
                //Clear the table after click
                viewModel.cList([]);
                viewModel.student_id(id);
                // Getting data [info][student] from the server and knockout saves to the studentModel
                viewModel.sFname(data['info']['student'][0]['sFname']);
                viewModel.sMname(data['info']['student'][0]['sMname']);
                viewModel.sLname(data['info']['student'][0]['sLname']);
                viewModel.sAddress(data['info']['student'][0]['sAddress']);
                viewModel.sNotes(data['info']['student'][0]['sNotes']);
             
                
                /**Getting data [info][contacts] from the server and knockout saves it to contactList  
                 * @param arrayID, array value
                 */
                $.each(data['info']['contacts'],function(arrayID,person){
                  
                    viewModel.cID(person['cID']);
                    viewModel.cFName(person['cFName']);
                    viewModel.cLName(person['cLName']);
                    viewModel.cEmail(person['cEmail']);
                    viewModel.cTitle(person['cTitle']);
                    viewModel.cPhone(person['cPhone']);
                    viewModel.cNotes(person['cNotes']);
                    
                    viewModel.cSave();  
                
                });
                
                
              });   
    
         viewModel.showStudentInfo(true);
            //Displays the Business Information Forms and Tables
           // document.getElementById('sInfo').style.display = 'inherit';
        
        }
        else 
        {
            //Removes selected for current selected when clicked to another tr.
            sTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    
   
    
    $(document).ready(function() {
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
    
    
});
