<nav class="navbar navbar-expand-lg bg-primary ">
    <div class="container">
      <a class="navbar-brand text-white" href="#">Student Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('students#home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('students#createPage') }}">Create</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
