keep trying bro &lt;3

<form method="POST">
  @csrf
  <select name="sel" id="">
    <option value="">Seleccionar...</option>
  </select>
  <input type="date" value="{{ $course->start_ins->format(DV) }}">
  <input type="time" value="{{ $course->start_time->addHours(6)->format(TV) }}">
  <button type="submit"></button>
</form>
<hr>
<p>{{ $course->start_ins->format(DF) }}</p>
<p>{{ $course->end_ins }}</p>
<p>{{ $course->start_course }}</p>
<p>{{ $course->end_course }}</p>
<p>{{ $course->start_time->addHours(4)->addMinutes(59)->format(TF) }}</p>
<p>{{ $course->end_time }}</p>