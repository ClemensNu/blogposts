
    
                            <div class="control-group col-12">
                                <label for="blogPostTitle">Create a new Author</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Please Enter Name of the Author" value="{{old('name',optional($author ?? null)->name)}}" aria-describedby="nameHelp" required>
                                       
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="blogPostContent"> Author E-mail</label>
                                <textarea id="email" class="form-control" name="email" 
                                placeholder="Please enter e-mail of the author"  value="{{old('email',optional($profile ?? null)->email)}}" aria-describedby="emailHelp" required></textarea>
                            </div>
                             @if($errors->any())
                                <div class = "mb-3">
                                     <ul class="list-group">
                                         @foreach($errors->all () as $error)
                                           <li class="list-group-item list-group-item-danger">{{$error}}
                                            </li>
                                            @endforeach

                                           


                                      </ul>
                                </div>
                            @endif
     

