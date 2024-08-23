import React from 'react'
import CharacterTableRow from "./CharacterTableRow.jsx"

const CharacterTable = ({ items }) => {
    return (
        <div className="flex flex-col h-screen">
            <div className="flex-grow overflow-auto">
                <table className={"relative w-full border rounded text-gray-700"}>
                    <thead>
                    <tr>
                        <th className={"sticky -top-1 border border-black bg-gray-400 py-2"}>Name</th>
                        <th className={"sticky -top-1 border border-black bg-gray-400 py-2"}>Alias</th>
                        <th className={"sticky -top-1 border border-black bg-gray-400 py-2"}>Gender</th>
                        <th className={"sticky -top-1 border border-black bg-gray-400 py-2"}>Culture</th>
                    </tr>
                    </thead>
                    <tbody className={"divide-y bg-gray-200"}>
                    {items.map((character) => (
                        <CharacterTableRow key={character.url} character={character}/>
                    ))}
                    </tbody>
                </table>
            </div>
        </div>
            )
            }

            export default CharacterTable
