

@extends('layout')
@section('title', 'Contact Page')

@section('content')

    <form class="uk-form uk-form-horizontal">

        <div class="uk-form-row">
            <label class="uk-form-label" for="form-h-it">Text input</label>
            <div class="uk-form-controls">
                <input type="text" id="form-h-it" placeholder="Text input">
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="form-h-ip">Password input</label>
            <div class="uk-form-controls">
                <input type="password" id="form-h-ip" placeholder="Password input">
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="form-h-s">Select field</label>
            <div class="uk-form-controls">
                <select id="form-h-s">
                    <option>Option 01</option>
                    <option>Option 02</option>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="form-h-t">Textarea</label>
            <div class="uk-form-controls">
                <textarea id="form-h-t" cols="30" rows="5" placeholder="Textarea text"></textarea>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">Radio input</span>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="radio" id="form-h-r" name="radio"> <label for="form-h-r">Radio input</label><br>
                <input type="radio" id="form-h-r1" name="radio"> <label for="form-h-r1">1</label>
                <label><input type="radio" name="radio"> 2</label>
                <label><input type="radio" name="radio"> 3</label>
            </div>
        </div>
        <div class="uk-form-row">
            <span class="uk-form-label">Checkbox input</span>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="checkbox" id="form-h-c"> <label for="form-h-c">Checkbox input</label><br>
                <input type="checkbox" id="form-h-c1"> <label for="form-h-c1">1</label>
                <label><input type="checkbox"> 2</label>
                <label><input type="checkbox"> 3</label>
            </div>
        </div>
        <div class="uk-form-row">
            <span class="uk-form-label">Mixed controls</span>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="checkbox" id="form-h-mix4"> <label for="form-h-mix4">Checkbox input</label>
                <input type="number" id="form-h-mix5" min="0" max="10" value="5" class="uk-form-width-mini uk-form-small"> <label for="form-h-mix5">Number input</label>
                <select id="form-h-mix6" class="uk-form-small">
                    <option selected="selected">Option 01</option>
                    <option>Option 02</option>
                </select>
                <label for="form-h-mix6">Select field</label>
            </div>
        </div>

    </form>


@endsection


