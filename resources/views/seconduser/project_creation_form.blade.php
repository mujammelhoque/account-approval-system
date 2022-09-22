
    @extends('seconduser.layout')


    @section('pagecontent')
 
      <div class="container">
      <div class="text-right mt-2">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bankModal">
        Create Bank 
        </button>
       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#branchModal">
        Create Branch 
        </button>
      </div>
      <form action="/action_page.php">
       
        <div class="form-group">
          <label for="bankname">Bank Name:</label>
          <select name="bankname" id="bankname" class="form-control">
            <option value="" readonly>select one</option>
          </select>
        </div>
        <div class="form-group">
          <label for="bankname">Branch Name:</label>
          <select name="bankname" id="bankname" class="form-control">
            <option value="" readonly>select one</option>
          </select>
        </div>
        <div class="form-group">
          <label for="department">Department</label>
          <select name="department" id="department" class="form-control">
            <option readonly  value="">Select One</option>
            <option value="1">Electrical</option>
            <option value="2">Enrgy Audit</option>
            <option value="3">Construction</option>
          </select>

        </div>
        <div class="form-group">
          <label for="project">Project Name:</label>
          <input type="text" class="form-control" id="project">
        </div>

     
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

    {{-- modal --}}
    <!-- Button to Open the Modal -->

  
  <!-- The Bank Modal -->
  <div class="modal" id="bankModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Bank Name</h4>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Bank name:</label>
            <input type="text" class="form-control" id="name">
          </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
  
      </div>
    </div>
  </div>
  
  <!-- The Branch Modal -->
  <div class="modal" id="branchModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Branch Name</h4>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="bankname">Bank Name:</label>
            <select name="bankname" id="bankname" class="form-control">
              <option value="" readonly>select one</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Branch name:</label>
            <input type="text" class="form-control" id="name">
          </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
  
      </div>
    </div>
  </div>
    @endsection