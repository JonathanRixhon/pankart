export default class Form {
  static get selector() {
    return '.form-js'
  }
  constructor(element) {
    this.formElt = element
    this.allLabels = this.formElt.querySelectorAll('label')
    this.allInputs = this.formElt.querySelectorAll('input,textarea')
    this.init()
  }
  init() {
    this.allInputs.forEach(input => {
      input.addEventListener('focus', e => this.open(e.target))
      input.addEventListener('focusout', e => this.close(e.target))
    })
  }
  open(input) {
    console.log('cc')
    input.style.zIndex = '1'
  }
  close(input) {
    if (!input.value) {
      input.style = ''
    }
  }
}
