const new_task = document.getElementById("new_task")
const ft_list = document.getElementById("ft_list")

new_task.addEventListener('click',  ft_onClick)

const cookies = document.cookie.split(';').reduce((cookies, cookie) => {
    const [ name, value ] = cookie.split('=').map(c => c.trim());
    cookies[name] = value;
    return cookies;
}, {});

let i = 0
const keys = Object.keys(cookies)

if (keys[0] !== "") {
    i = keys.length
    let values = Object.values(cookies)
    values.forEach((val, index) => {
        const div = document.createElement('div')
        div.className = `item-${keys[index]}`
        div.id = keys[index]
        div.innerHTML = `<a href="#" onclick=" ft_deleteTodo(${keys[index]})">${val}</a>`
        ft_list.insertBefore(div, ft_list.firstChild)
    })
}
   
function  ft_deleteTodo(id) {
    let el = document.getElementById(id)
    const confirm = window.confirm(`Are you sure you want to delete todo ${el.textContent}?`);
    if (confirm) {
        ft_list.removeChild(el)
        ft_deleteCookie(id)
    } 
}

function  ft_addTodo(todo) {
    todo = todo.trim()
    const div = document.createElement('div')
    div.className = `item-${i}`
    div.id = i
    div.innerHTML = `<a href="#" onclick=" ft_deleteTodo(${i})">${todo}</a>`
    ft_list.insertBefore(div, ft_list.firstChild)
     ft_createCookie(i++, todo, 7)
}

function  ft_onClick () {
    let input = window.prompt("Add a new task:")
    if (input)
         ft_addTodo(input)
}

function  ft_createCookie(cookieName,cookieValue,daysToExpire) {
    let date = new Date()
    date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000))
    document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString()
}

function  ft_deleteCookie( name ) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }