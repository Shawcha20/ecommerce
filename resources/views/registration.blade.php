<!-- user registration-->
@extends('layout.basic')
@section('title', 'registration')
@section('basic')
<div class="container-fluid bg-light text-light py-3">
    <div class="row justify-content-center">
        <header class="text-center bg-dark py-3 rounded col-10">
            <h1 class="display-6 text-light">Sign Up</h1>
        </header>
    </div>
        <section class="container">
            <div class="card shadow">
                <div class="card-body" style="background-color: #f8f9fa;">
                    <form action="{{route('login.signup')}}" class="row g-3 text-dark" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="phn" class="form-label">Phone</label>
                            <input type="tel" name="phn" class="form-control">
                            <span class="text-danger">
                                @error('phn')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12">
                            <label for="current_address" class="form-label">Current Address</label>
                            <input type="text" name="current_address" class="form-control">
                            <span class="text-danger">
                                @error('current_address')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12">
                            <label for="permanent_address" class="form-label">Permanent Address</label>
                            <input type="text" name="permanent_address" class="form-control">
                            <span class="text-danger">
                                @error('permanent_address')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label for="altphn" class="form-label">Alt Phone</label>
                            <input type="tel" name="altphn" class="form-control">
                            <span class="text-danger">
                                @error('altphn')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label"> city</label>
                            <select name="city" id="city-list" class="form-control">
                                <option value="" disabled selected >select city</option>
                            </select>
                            <span class="text-danger">
                                @error('city')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</div>
<script>
    const cityList = document.getElementById("city-list");
    const jsonArrayString = '[{"id": "1","name": "Barishal"},{"id":"2" ,"name": "Chattogram"},{"id": "3","name": "Dhaka"},{"id": "4","name": "Khulna"},{"id": "5","name": "Rajshahi"},{"id": "6","name": "Rangpur"},{"id": "7", "name": "Sylhet"},{"id": "8","name": "Mymensingh" }]';
    const city = JSON.parse(jsonArrayString);

    city.forEach(city => {
        const option = document.createElement("option");
        option.value = city.name;
        option.textContent = city.name;
        cityList.appendChild(option); // Changed from color to colorList
    });
 </script>

@endsection
