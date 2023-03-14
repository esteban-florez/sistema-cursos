@extends('errors::layout')

@section('title', __('Acceso denegado'))
@section('code', '403')
@section('title-message', __('Acceso denegado'))
@section('message', __($exception->getMessage() ?: '¡Lo sentimos! El acceso a este recurso en el servidor está denegado.'))
