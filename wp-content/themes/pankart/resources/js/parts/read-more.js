export default class lastSong {
  static get selector() {
    return '.sg-song'
  }
  constructor(element) {
    this.articleElt = element
    this.linkElt = this.articleElt.querySelector('.sg-song__read-more')
    this.desctiptionElt = this.articleElt.querySelector('.sg-song__description')
    this.init()
  }
  init() {
    console.log(this.linkElt)
    this.linkElt.addEventListener('click', e => {
      e.preventDefault()
      this.open()
    })
  }
  open() {
    this.desctiptionElt.classList.toggle('sg-song__description_open')
    this.checkOpen()
  }
  checkOpen() {
    if (this.desctiptionElt.classList.contains('sg-song__description_open')) {
      this.linkElt.textContent = 'Masquer'
      return
    }
    this.linkElt.textContent = 'lire la suite'
  }
}
