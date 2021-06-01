import Pluton from 'whitecube-pluton'
class Pankart {
  constructor() {
    document.documentElement.classList.add('js-enabled')
  }
  load() {
    this.pluton = new Pluton()
  }
}

window.addEventListener('load', e => {
  window.easyspacy = new Pankart()
  window.easyspacy.load()
})
