<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row">
          <div class="col-lg-8">
              <h4 class="card-title ">{{$title_page}}</h4>
              <p class="card-category"> {{$desc_page}}</p>
          </div>
          {{$addButton}}
        </div>
      </div>
      <div class="card-body">
         {{$slot}}
      </div>
    </div>
  </div>
</div>