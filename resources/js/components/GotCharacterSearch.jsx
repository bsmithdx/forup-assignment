import React, {useEffect, useState} from "react"
import SearchField from "./SearchField.jsx"
import CharacterTable from "./CharacterTable.jsx"
import apiFetcher from "../lib/apiFetcher.js"
import {useDebounce} from "use-debounce";

const GotCharacterSearch = () => {
    const [characterSearchResults, setCharacterSearchResults] = useState([])
    const [searchQuery, setSearchQuery] = useState("")
    const [debouncedQuery] = useDebounce(searchQuery, 2000)
    useEffect(() => {
        const fetcher = apiFetcher('/characters' + (searchQuery !== "" ? `?name=${searchQuery}` : ""))
        fetcher.then((result) => {
            setCharacterSearchResults(result)
        })
            .catch((error) => {
                console.error('Error fetching Characters:', error)
            })
    }, [debouncedQuery])

    return (
        <div>
            <h1 className={"text-4xl"}>Game Of Thrones Character Search</h1>
            <SearchField searchQuery={searchQuery} setSearchQuery={setSearchQuery}/>
            <CharacterTable items={ characterSearchResults } />
        </div>
    )
}

export default GotCharacterSearch
