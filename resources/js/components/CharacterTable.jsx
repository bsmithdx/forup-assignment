import React from 'react';
import CharacterTableRow from "./CharacterTableRow.jsx";

const CharacterTable = ({ items }) => {
    return (
        <div>
            <table className={"min-w-full divide-y"}>
                <thead className={"bg-gray-400"}>
                    <tr>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Culture</td>
                        <td>Alias</td>
                    </tr>
                </thead>
                <tbody className={"bg-gray-200"}>
                {items.map((character) => (
                   <CharacterTableRow key={character.id} character={character} />
                ))}
                </tbody>
            </table>
        </div>
    )
}

export default CharacterTable;
