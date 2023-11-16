<?php
function formatDate($date)
{
  if ($date != null) {
    return date('h:i | d-m-Y', strtotime($date));
  }
}
function formatNumberPrice($number)
{
  return number_format($number, 0, '.', ',') . " VND";
}
function uploadFile($nameFolder, $file)
{
  $fileName = time() . '_' . $file->getClientOriginalName();

  return $file->storeAs($nameFolder, $fileName, 'public');
}
