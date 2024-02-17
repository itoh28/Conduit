<x-common>

    <div class="editor-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-xs-12">
                    <div class="error-messages">
                        <x-input-error class="mb-4" :messages="$errors->all()" />
                    </div>
                    @if(session('message'))
                    {{session('message')}}
                    @endif

                    <form method="post" action="{{route('post.store')}}">
                        @csrf
                        <fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="title" class="form-control form-control-lg" value="{{old('title')}}" placeholder="Article Title" />
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="summary" class="form-control" value="{{old('summary')}}" placeholder="What's this article about?" />
                            </fieldset>
                            <fieldset class="form-group">
                                <textarea class="form-control" name="body" rows="8" placeholder="Write your article (in markdown)">{{old('body')}}</textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="tags" class="form-control" value="{{old('tags')}}" placeholder="Enter tags separated by spaces" />
                                <div class="tag-list">
                                    <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
                                </div>
                            </fieldset>
                            <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                                Publish Article
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-common>