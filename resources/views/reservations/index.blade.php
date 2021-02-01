<x-layout>
  <!-- !PAGE CONTENT! -->
  <div class="table-body" class="therichpost-main" style="margin-left:300px;">
    <!-- Header -->
    <header class="therichpost-container" style="padding-top:22px">
      <h5><b><i class="fa fa-calendar"></i> Reservations</b></h5>
    </header>
    <div class="container">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-xl-9">
                <h2>Manage <b>Reservations</b></h2>
              </div>
              <div class="col-xs-6 ">
                <a href="/customers" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Reservation</span></a>					
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover current-reservations">
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
              @foreach ($reservations as $reservation)
              <tr>             
                    <td>{{$reservation->id}}</td>    
                    <td>{{$reservation->customer->name}}</td>
                    <td>{{$reservation->product_id}}</td>
                    <td>{{$reservation->active}}</td>
                    <td>{{$reservation->price}}</td>
                    <td>{{$reservation->date_of_rent}}</td>
                    <td>{{$reservation->date_of_return}}</td>
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