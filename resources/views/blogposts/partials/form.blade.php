
    
                            <div class="control-group col-12">
                                <label for="blogPostTitle">Blog Post Title</label>
                                <input type="text" id="blogPostTitle" class="form-control" name="blogPostTitle"
                                       placeholder="Please insert title of the blog" value="{{old('blogPostTitle',optional($blogpost ?? null)->blogPostTitle)}}" aria-describedby="titleHelp" required>
                                       
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="blogPostContent"> Blog Post Content</label>
                                <textarea id="blogPostContent" class="form-control" name="blogPostContent" 
                                placeholder="Please insert content of the Blog Post"  value="{{old('blogPostContent',optional($blogpost ?? null)->blogPostContent)}}" aria-describedby="contentHelp" required></textarea>
                            </div>
                        
                            <div>
                                <input type="checkbox" class="form-check-input" id="blogPostIsHighlight" name="blogPostIsHighlight" value="">
                                <label class="form-check-lable" for="blogPostIsHighlight"> Highlight Blog Post</label>
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
     

