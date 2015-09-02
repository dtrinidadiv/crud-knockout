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
  stud_id:    ko.observable(),
  btnCancel:  ko.observable(),

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
  }
 
  
};


i = 0;

viewModel.sSave = function(){
  
  var self = this, 
  callback = 'successMsg';
  
  if(viewModel.stud_id() == null){
    self.onRequest('save', successMsg, callback);
    alert('Data Inserted on the database');
  }else{
    self.onRequest('update', successMsg, callback);
    self.onRequest('remove', successMsg, callback);
    alert('Data Updated on the database');
  }
  viewModel.edit(false);
  
};

viewModel.cAdd = function(){
  var self = this;
  self.cFName([]);
  self.cLName([]);
  self.cEmail([]);
  self.cTitle([]);
  self.cPhone([]);
  self.cPType([]);
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

 

// *** JR: the following notes are for you, in case you may need them:
// ***
// *** KO: Subscribe (subscription) defined:
// **
// ** Options for SUBSCRIBE KO: "change" or "beforeChange" (these have to do about when the subscribe function is called)
// **
// ** Example:
// ** var mySub = myViewModel.nameOfObservable.subscribe( callback ,target ,event )  <-- params for subscribe
// **
// ** 'callback' is the function that is called whenever the observable is changed & the notification happens
// ** 'target' (optional) defines the value of 'this' in the callback function
// ** 'event'  (optional) default is "change" and is the name of the event to receive notification for (other options: "beforeChange")

//ko.applyBindings(viewModel, $("#viewModel")[0]);
// ko.applyBindings(mAgency, $("#magency")[0]);
// var mainModel = {
//   viewModel,
//   mAgency
// };
ko.applyBindings(viewModel);