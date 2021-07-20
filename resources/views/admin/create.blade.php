<div class="container_form">
    <div class="form-group">

      <form action="{{route('adminarticles.store')}}" method="POST">
        {{ csrf_field() }}

        <label for=""></label>
        <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId"">
        <small id="helpId" class="text-muted">inserisci il titolo</small>

        <label for=""></label>
        <textarea name="content" id="content" class="form-control" placeholder="" aria-describedby="helpId" rows="5"></textarea>
        <small id="helpId" class="text-muted">inserisci il contenuto</small>
        
        <div class="submit">
          <button>Submit</button>
        </div>

      </form>

    </div>
      <div class="button">
        <a href="{{route('adminhome')}}">Go back to DB</a>
      </div>
  </div>