<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i> Customer</b></h5>
      </header>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Customer</b></h2>
                </div>
                <div class="col-xs-6 ">
                  <a href="/product/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Product</span></a>					
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Jbk</th>
                  <th>Place</th>
                  <th>Addresss</th>
                  <th>Name</th>                 
                  <th>Phone number</th>
                  <th>Money spent</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>             
                      <td>{{$customer->id}}</td>    
                      <td>{{$customer->jbk}}</td>
                      <td>{{$customer->opstina}}</td>
                      <td>{{$customer->address}}</td>
                      <td>{{$customer->name}}</td>
                      <td>{{$customer->phone_number}}</td>
                      <td>{{$customer->money_spent}}</td>
                      <td>{{$customer->comment}}</td>
                  <td class="action-td">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="edit" ><i class="fa fa-pencil"  title="Edit"></i></a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="dlt-form">
                      @csrf
                      @method('DELETE')
                      <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true"  title="Delete"></i></button>
                    </form>
                    <form action="{{ route('reservations.create') }}" method="GET" class="dlt-form">
                      @csrf
                      <input type="text" hidden value="{{$customer->id}}" name="customer_id">
                      <button class="rsvr-btn" type="submit" class="delete" ><i class="fa fa-calendar" aria-hidden="true"  title="Submit"></i></button>
                    </form>
                  </td>
                </tr>              
              </tbody>
              
            </table>
        </div>        
        </div>

        <div class="container">
            <div class="table-responsive">
              <div class="table-wrapper">
                <div class="table-title">
                  <div class="row">
                    <div class="col-xl-9">
                      <h2>All <b>Reservations</b></h2>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Number:</th>
                      <th>Customer:</th>
                      <th>Product:</th>
                      <th>Status:</th>                              
                      <th>Price:</th>
                      <th>Date of rent:</th>
                      <th>Date of return:</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customerReservations as $reservation)
                    <tr>             
                          <td>{{$reservation->id}}</td>    
                          <td>{{$reservation->customer->name}}</td>
                          <td>{{$reservation->product->name}}</td>
                          <td>{{($reservation->active) ? 'Collected'  : "Active"}}</td>
                          <td>{{$reservation->price}}</td>
                          <td>{{$reservation->date_of_rent->toDateString()}}</td>
                          <td>{{$reservation->date_of_return->toDateString()}}</td>
                      <td class="action-td">
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="edit" ><i class="fa fa-pencil"  title="Edit"></i></a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="dlt-form">
                          @csrf
                          @method('DELETE')
                          <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true"  title="Delete"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                  
                </table>
      
            </div>        
            </div>
     
  </x-layout>