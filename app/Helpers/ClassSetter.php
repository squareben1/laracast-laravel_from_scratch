class ClassSetter {
  public function setClass(path) {
  return {{Request::path() === '{{path}}' ? 'current_page_item' : ''}};
}
}
