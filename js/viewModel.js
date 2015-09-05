var viewModel = {
  
  sID:        ko.observable(),
  sFname:     ko.observable(),
  sMname:     ko.observable(),
  sLname:     ko.observable(),
  sAddress:   ko.observable(),
  sNotes:     ko.observable(),
  sType:      ko.observable(),

  cID:        ko.observable(),
  cFName:     ko.observable(),
  cLName:     ko.observable(),
  cEmail:     ko.observable(),
  cTitle:     ko.observable(),
  cPhone:     ko.observable(),  
  cNotes:     ko.observable(),  
  cList:      ko.observableArray([]),

  removed_cid: ko.observableArray([]),
  cid_delete: ko.observable(),
  edit:       ko.observable(false),
  student_id:    ko.observable(),
  btnCancel:  ko.observable(),
  showInfo:   ko.observable(true),
  showModal:  ko.observable('modal'),
  showRow:    ko.observable(false),
  showStudentInfo:    ko.observable(false),



  onRequest: function(req, options, callback){
    var json,
        self = this;
        
    json = ko.toJS(viewModel);
    json.request = req;
    json.student_id = viewModel.student_id();
    
    $.ajax({
      url:  'classes/class.main.php',
      type: 'POST',
      data: {'json' : JSON.stringify(json)},
      success: function(data){
          window[callback](data);
      }
       
    });
  },
  

  //Student Model
  studentModel: function(sID,sFname,sMname,sLname,sAddress,sNotes,sType){
    var self        = this;
    self.sID        = ko.observable(sID);
    self.sFname     = ko.observable(sFname);
    self.sMname     = ko.observable(sMname);
    self.sLname     = ko.observable(sLname);
    self.sAddress   = ko.observable(sAddress); 
    self.sNote      = ko.observable(sNotes);
    self.sType      = ko.observable(oType);

  },

    //Contact Model
  contactModel: function(cID,cFName,cLName,cEmail,cTitle,cPhone,cNotes){
    var self        = this;
    self.cID        = ko.observable(cID);
    self.cFName     = ko.observable(cFName);
    self.cLName     = ko.observable(cLName);
    self.cEmail     = ko.observable(cEmail);
    self.cTitle     = ko.observable(cTitle);
    self.cPhone     = ko.observable(cPhone);
    self.cNotes    = ko.observable(cNotes);
  },
   contactID: function(cid_delete){
    var self = this;
    self.cid_delete = ko.observable(cid_delete);
  },
 
  
};


i = 0;

viewModel.sSave = function(){
  alert('ssave');
  var self = this, 
  callback = 'successMsg';
  
  if(viewModel.student_id() == null){
    self.onRequest('save', successMsg, callback);
    alert('Data Inserted on the database');

  }else{
    self.onRequest('update', successMsg, callback);
   // self.onRequest('remove', successMsg, callback);
   
    alert('Data Updated on the database');
  }
  viewModel.showStudentInfo(false);
  viewModel.edit(false);
  viewModel.updateTable();
  
};

viewModel.cAdd = function(){
  var self = this;
  self.cFName([]);
  self.cLName([]);
  self.cEmail([]);
  self.cTitle([]);
  self.cPhone([]);
  self.cNotes([]);
  viewModel.edit(false);
  
};

viewModel.cClear = function(){

  if (confirm('Are you sure you want to clear contact list?')) {
    
    viewModel.cList([]);
  }
   
}
  
viewModel.cSave = function(){
  if(viewModel.edit() == false){
    viewModel.cList.push(new viewModel.contactModel(

      viewModel.cID(),
      viewModel.cFName(),
      viewModel.cLName(),
      viewModel.cEmail(),
      viewModel.cTitle(),
      viewModel.cPhone(),
      viewModel.cNotes()
    ));
  }
  
  if(viewModel.edit() == true){
    var update = viewModel.cList()[i];
      
      update.cID(viewModel.cID());
      update.cFName(viewModel.cFName());
      update.cLName(viewModel.cLName());
      update.cEmail(viewModel.cEmail());
      update.cTitle(viewModel.cTitle());
      update.cPhone(viewModel.cPhone());
      update.cNotes(viewModel.cNotes());
  }
  
  viewModel.edit(false);
  
};

this.cUpdate = function(item){
  
  var updateItem = viewModel.cList()[item];
  viewModel.cID(updateItem.cID());
  viewModel.cFName(updateItem.cFName());                                     
  viewModel.cLName(updateItem.cLName());
  viewModel.cEmail(updateItem.cEmail());
  viewModel.cTitle(updateItem.cTitle());
  viewModel.cPhone(updateItem.cPhone());
  viewModel.cNotes(updateItem.cNotes());
  
  viewModel.edit(true);
  i = item;
  
};

this.cDelete = function(index){
  var updateItem = viewModel.cList()[i];
  viewModel.cid_delete(updateItem.cID());
  viewModel.removed_cid.push(new viewModel.contactID(viewModel.cid_delete()));

  if (confirm('Are you sure you want to delete this item?')) {
    
    //remove the currently selected contact from the array
    viewModel.cList.remove(index);
  }
};
viewModel.btnCancel = function(){
  
};


viewModel.showTable = function(){
  
    viewModel.showRow(!viewModel.showRow());
    viewModel.showInfo(!viewModel.showInfo());
    var sTable = $('#studentTable').dataTable();
    
    $.ajax({
        url: 'classes/class.main.php',
        dataType: 'json',
        success: function (data) {
            sTable.fnClearTable();
            for(var i = 0; i <  data['info']['allStudents'].length; i++) {
                sTable.fnAddData([
                    data['info']['allStudents'][i]['sID'],
                    data['info']['allStudents'][i]['sFname'],
                    data['info']['allStudents'][i]['sMname'],
                    data['info']['allStudents'][i]['sLname'],
                    data['info']['allStudents'][i]['sAddress'],
                    data['info']['allStudents'][i]['sNotes']
                ]);
            }
        },
        error: function(ts) { alert(ts.responseText) }
    });
    

};

viewModel.updateTable= function(){
  
    var sTable = $('#studentTable').dataTable();
    
    $.ajax({
        url: 'classes/class.main.php',
        dataType: 'json',
        success: function (data) {
            sTable.fnClearTable();
            for(var i = 0; i <  data['info']['allStudents'].length; i++) {
                sTable.fnAddData([
                    data['info']['allStudents'][i]['sID'],
                    data['info']['allStudents'][i]['sFname'],
                    data['info']['allStudents'][i]['sMname'],
                    data['info']['allStudents'][i]['sLname'],
                    data['info']['allStudents'][i]['sAddress'],
                    data['info']['allStudents'][i]['sNotes']
                ]);
            }
        },
        error: function(ts) { alert(ts.responseText) }
    });
    

};

function successMsg(){
    $.getJSON('classes/class.main.php',
    function(data){
      console.log(JSON.stringify(data));
    });
}


ko.applyBindings(viewModel);