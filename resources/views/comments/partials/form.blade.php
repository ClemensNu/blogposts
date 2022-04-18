
    
                        
                            </div>
                            <div class="control-group ">
                                <label for="commentContent"> Blog Post Comment</label>
                                <textarea id="commentContent" class="form-control" name="commentContent" 
                                placeholder="Please insert comment to the selected blog"  value="{{old('commentContent',optional($comment ?? null)->commentContent)}}" aria-describedby="contentHelp" required></textarea>
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
     

