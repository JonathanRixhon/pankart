export default class lastSong {
  static get selector() {
    return '.sg-new-interaction__item_share'
  }
  constructor(element) {
    this.listElt = element
    this.linkList = document.querySelector('.interaction-sub-list')
    this.buttonElt = this.listElt.querySelector(
      '.sg-new-interaction__button_share'
    )
    this.isOpen = false
    this.init()
  }
  init() {
    this.checkOpen
    this.buttonElt.addEventListener('click', e => {
      this.open()
      console.log(this.linkList)
    })
  }
  open() {
    this.isOpen = !this.isOpen
    this.checkOpen()
  }
  checkOpen() {
    if (this.isOpen === false) {
      this.linkList.classList.remove('interaction-sub-list_open')
    } else {
      this.linkList.classList.add('interaction-sub-list_open')
    }
  }
}
