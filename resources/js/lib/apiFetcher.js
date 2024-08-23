
function apiFetcher(url, method = 'GET', data = {}, headers = {}, attempts = 0) {
    const req = new Request(`${import.meta.env.VITE_PUBLIC_API_ROOT}` + url, {
        headers,
        method: method.toUpperCase(),
        body: Object.keys(data).length > 0 ? JSON.stringify(data) : null,
    })
  return fetch(req)
    .then((res) => {
      if (res.status === 404) {
        const e404 = Error('Resource not found')
        e404.code = 404
        throw e404
      }

      if (res.status >= 200 && res.status <= 299) {
        return res.json()
      }

      return Promise.reject(res.json())
    })
    .catch((resp) => {
      if (resp === undefined || resp.then === undefined) {
        throw resp
      }
      return resp.then(function (data) {
        if (data.error) {
          throw data.error
        } else {
          throw data
        }
      })
    })
}

export default apiFetcher
