@extends('errors::layout')

@section('title', __('No autorizado'))
@section('code', '401')
@section('title-message', __('No autorizado'))
@section('message', __('¡Lo siento! Autorización fallida. Actualice la página e intente nuevamente.'))
