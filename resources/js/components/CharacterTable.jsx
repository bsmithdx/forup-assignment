import React from 'react'
import CharacterTableRow from "./CharacterTableRow.jsx"

const CharacterTable = ({ items }) => {
    return (
        <div>
            <table className={"min-w-full divide-y shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"}
            >
                <thead className={"bg-gray-400 border-solid border-b-2 border-black"}>
                <tr>
                    <td className={"border-solid border-r-2 border-black"}>Name</td>
                    <td className={"border-solid border-r-2 border-black"}>Alias</td>
                    <td className={"border-solid border-r-2 border-black"}>Gender</td>
                    <td>Culture</td>
                </tr>
                </thead>
                <tbody className={"bg-gray-200"}>
                {items.map((character) => (
                   <CharacterTableRow key={character.url} character={character} />
                ))}
                </tbody>
            </table>
        </div>
    )
}

export default CharacterTable
