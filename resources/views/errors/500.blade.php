@extends('errors::layout')

@section('title', __('Error del servidor'))
@section('code', '500')
@section('message', __('¡Vaya! Algo salió mal. No se puede procesar la solicitud en este momento, inténtelo de nuevo más tarde.'))
