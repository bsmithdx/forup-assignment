import React from "react"

const SearchField = ({ searchQuery, setSearchQuery }) => {
    return (
        <div className={"py-3"}>
            <label className={"block text-gray-700 text-sm font-bold mb-2"}>
                Search by Full Name:
                <input
                    name="name"
                    value={ searchQuery }
                    onChange={e => {
                        setSearchQuery(e.target.value)
                    }}
                    className={"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"}
                />
            </label>
        </div>
    )
}

export default SearchField
