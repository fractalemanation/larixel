<label for="">Статус</label>
<select class="form-control" name="published">
	@if (isset($article->id))
	<option value="0" @if ($article->published == 0) selected="selected" @endif>Не опубликовано</option>
	<option value="1" @if ($article->published == 1) selected="selected" @endif>Опубликовано</option>
	@else
	<option value="0">Не опубликовано</option>
	<option value="1">Опубликовано</option>
	@endif
</select>
<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title or ""}}" required="required">
<br><input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug or ""}}" readonly="readonly">
<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="multiple">
	<option value="0">-- без родительской категории --</option>
	@include('admin.articles.partials.categories', ['categories' => $categories])
</select>
<label for="">Краткое описание</label>
<textarea class="form-control" rows="8" id="description_short" name="description_short" placeholder="Краткое описание">{{$article->description_short or ""}}</textarea>
<label for="">Полное описание</label>
<textarea class="form-control" rows="8" id="description" name="description" placeholder="Полное описание">{{$article->description_short or ""}}</textarea>
<hr>
<label for="">Мета заголовок</label>
<input class="form-control" type="text" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title or ""}}">
<label for="">Мета описание</label>
<input class="form-control" type="text" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description or ""}}">
<label for="">Ключевые слова</label>
<input class="form-control" type="text" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keyword or ""}}">
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">
<br><br>